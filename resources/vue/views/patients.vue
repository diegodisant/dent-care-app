<template>
  <div>
    <loading-screen
      :loading="isWindowLoading"
    ></loading-screen>
    <div class="table-section" v-if="isFormShowing === false && isDeleteConfirmShowing === false">
      <div class="grid grid-cols-1 gap-10 justify-items-center">
        <div>
          <table class="table-auto">
            <thead>
            <tr>
              <th
                v-for="tableHeader of model.getTableHeaders()"
                class="py-4 px-2"
              >
                {{ tableHeader }}
              </th>
            </tr>
            </thead>
            <tbody>
            <tr
              v-for="(patient, patientIndex) of models"
            >
              <th class="py-3 px-3">{{ patientIndex + 1 }}</th>
              <td class="py-3 px-3">{{ patient.name }}</td>
              <td class="py-3 px-3">{{ patient.phoneNumber }}</td>
              <td class="py-3 px-3">{{ patient.birthDate }}</td>
              <td class="py-3 px-3">{{ patient.address }}</td>
              <td class="py-3 px-3">
                <span class="item-option material-icons edit" @click="onClickEditButton(patient)">mode_edit</span>
                <span class="item-option material-icons edit" @click="onClickDentoGramButton">history_edu</span>
                <span class="item-option material-icons delete" @click="onClickDeleteButton(patient)">delete</span>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="grid grid-cols-3 content-between gap-4 justify-items-center">
        <div></div>
        <paginator
          :pagination-data="paginationData"
          :on-click-prev="paginatorClickPrev"
          :on-click-next="paginatorClickNext"
          :on-click-first="paginatorClickFirst"
          :on-click-last="paginatorClickLast"
        ></paginator>
        <div></div>
      </div>
    </div>
    <div class="base-form" v-if="isFormShowing === true">
      <div class="grid grid-cols-1 gap-10 justify-items-center">
        <div>
          <h2 class="form-title" v-if="isAddFormShowing === true">Agregar</h2>
          <h2 class="form-title" v-if="isEditFormShowing === true">Editar</h2>
          <form>
            <div class="field">
              <label class="block">Nombre completo</label>
              <input class="form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" v-model="model.name" autocomplete="off">
            </div>
            <div class="field">
              <label class="block">Número telefónico</label>
              <input class="form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="tel" v-model="model.phoneNumber" autocomplete="off">
            </div>
            <div class="field">
              <label class="block">Fecha de nacimiento</label>
              <input class="form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="date" v-model="model.birthDate">
            </div>
            <div class="field">
              <label class="block">Dirección</label>
              <input class="form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" v-model="model.address" autocomplete="off">
            </div>
            <div class="buttons">
              <span class="button add" type="button" @click="onClickFormAddButton" v-if="isAddFormShowing === true">Agregar</span>
              <span class="button edit" type="button" @click="onClickFormEditButton" v-if="isEditFormShowing === true">Editar</span>
              <span class="button cancel" type="button" @click="onClickFormCancelButton">Cancelar</span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div>
      <button
        class="add-button"
        @click="this.onClickCreateButton"
        v-bind:class="{ 'disabled': isEditFormShowing, 'disabled': isEditFormShowing}"
      >
        <span class="material-icons">add</span>
      </button>
    </div>
    <div class="delete-confirm" v-if="isFormShowing === false && isDeleteConfirmShowing === true">
      <div class="grid grid-cols-1 gap-10 justify-items-center">
        <div></div>
        <div>
          <div class="main-icon"><span class=" material-icons">warning</span></div>
          <h2>¿Estás seguro que deseas al paciente con nombre <span>{{ model.name }}</span>?</h2>
          <div class="buttons">
            <span class="button add" type="button" @click="onClickDeleteConfirmButton">Aceptar</span>
            <span class="button cancel" type="button" @click="onClickDeleteConfirmCancelButton">Cancelar</span>
          </div>
        </div>
        <div></div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue';
import Component from "vue-class-component";
import ResourceCollectionResponse from "../../js/core/resource/response/ResourceCollectionResponse";
import ResourceCollection from "../../js/core/resource/ResourceCollection";
import ResourcePagination from "../../js/core/resource/model/ResourcePagination";
import AxiosServiceInterface from "../../js/core/service/communication/AxiosServiceInterface";
import AxiosService from "../../js/core/service/communication/AxiosService";
import {NonTypedObject} from "../../js/core/type/object/NonTypedObject";
import Patient from "../../js/core/model/Patient";

@Component({})
export default class Patients extends Vue {

  public model!: Patient;

  public models: Patient[];

  public paginationData: ResourcePagination;

  public isWindowLoading: boolean;

  public isAddFormShowing: boolean;

  public isEditFormShowing: boolean;

  public isDeleteConfirmShowing: boolean;

  public axiosService: AxiosServiceInterface;

  constructor() {
    super();

    this.models = [];
    this.isWindowLoading = true;
    this.isAddFormShowing = false;
    this.isEditFormShowing = false;
    this.isDeleteConfirmShowing = false;
    this.axiosService = new AxiosService();

    this.paginationData = {
      current_page: 1,
      first_page_url: "",
      from: 1,
      last_page: 1,
      last_page_url: null,
      next_page_url: null,
      path: "",
      per_page: 0,
      prev_page_url: null,
      to: 0,
      total: 0
    };
  }

  public created(): void {
    this.model = new Patient();

    this.all();
  }

  get isFormShowing(): boolean {
    return (
      this.isAddFormShowing ||
      this.isEditFormShowing
    );
  }

  public hideForms(): void {
    this.isAddFormShowing = false;
    this.isEditFormShowing = false;
    this.isDeleteConfirmShowing = false;
  }

  public all(): void {
    this.isWindowLoading = true;

    this.axiosService.all(
      this.model,
      (responseData: ResourceCollectionResponse) => {
        this.models = [];
        this.isWindowLoading = false;

        this.buildCollection(responseData);
      },
      (responseError: NonTypedObject) => {
        this.isWindowLoading = false;

        console.log(responseError);
      }
    );
  }

  public onClickCreateButton(): void {
    if (this.isEditFormShowing) {
      return;
    }

    this.hideForms();
    this.isAddFormShowing = true;
  }

  public onClickEditButton(patient: Patient): void {
    this.hideForms();
    this.isEditFormShowing = true;
    this.model = patient;
  }

  public onClickDeleteButton(patient: Patient): void {
    this.hideForms();
    this.isDeleteConfirmShowing = true;
    this.model = patient;
  }

  public onClickFormCancelButton(): void {
    this.hideForms();
  }

  public onClickFormAddButton(): void {
    this.isWindowLoading = true;

    this.axiosService.create(
      this.model,
      (responseData: NonTypedObject) => {
        this.hideForms();
        this.model.clear();
        this.model.setPage(this.paginationData.last_page);
        this.all();

        console.log(responseData);
      },
      (responseError: NonTypedObject) => {
        this.isWindowLoading = false;

        console.log(responseError);
      }
    );
  }

  public onClickFormEditButton(): void {
    this.isWindowLoading = true;

    setTimeout(() => {
      this.isWindowLoading = false;
      this.hideForms();
    }, 2000);

    const replacingIndex: number = _.findIndex(
      this.models,
      { id: this.model.id }
    );

    this.models.splice(
      replacingIndex,
      1,
      this.model.clone()
    );
  }

  public onClickDeleteConfirmButton(): void {
    this.isWindowLoading = true;

    this.models = _.remove(this.models, (user: Patient) => {
      return user.id !== this.model.id;
    });

    setTimeout(() => {
      this.isWindowLoading = false;
      this.hideForms();
    }, 2000);
  }

  public onClickDeleteConfirmCancelButton(): void {
    this.hideForms();

    this.isDeleteConfirmShowing = false;
  }

  public buildCollection(responseData: ResourceCollectionResponse): void {
    this.models = ResourceCollection.fromResponse<Patient>(
      responseData,
      Patient
    );

    this.paginationData = responseData.pagination;
  }

  public onClickDentoGramButton(): void {
    window.open(
      'https://app.derec.ch/patients/3f4d89ec-8334-4bd9-8060-c23ba3cdab21/chart',
      '_blank'
    );
  }

  public paginatorClickFirst(): void {
    this.model.setPage(1);
    this.all();
  }

  public paginatorClickPrev(): void {
    this.model.prevPage();
    this.all();
  }

  public paginatorClickNext(): void {
    this.model.nextPage();
    this.all();
  }

  public paginatorClickLast(): void {
    this.model.setPage(this.paginationData.last_page);
    this.all();
  }
};
</script>
