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
              v-for="(user, userIndex) of models"
            >
              <th class="py-3 px-3">{{ userIndex + 1 }}</th>
              <td class="py-3 px-3">{{ user.name }}</td>
              <td class="py-3 px-3">{{ user.email }}</td>
              <td class="py-3 px-3 item-badge">
                <span v-if="user.userType === 'admin'">admin</span>
                <span v-if="user.userType === 'patient'">paciente</span>
              </td>
              <td class="py-3 px-3">
                <span class="item-option material-icons edit" @click="onClickEditButton(user)">mode_edit</span>
                <span class="item-option material-icons delete" @click="onClickDeleteButton(user)">delete</span>
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
              <label class="block">Correo electrónico</label>
              <input class="form-inpu rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" v-model="model.email" autocomplete="off">
            </div>
            <div class="field">
              <label class="block">Contraseña</label>
              <input class="form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" v-model="model.password">
            </div>
            <div class="field">
              <label class="block">Tipo de usuario</label>
              <select class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" v-model="model.userType">
                <option value="admin">Administrador</option>
                <option value="patient">Paciente</option>
              </select>
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
          <h2>¿Estás seguro que deseas eliminar al usuario con email <span>{{ model.email }}</span>?</h2>
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
import User from "../../js/core/model/User";
import ResourceCollectionResponse from "../../js/core/resource/response/ResourceCollectionResponse";
import ResourceCollection from "../../js/core/resource/ResourceCollection";
import ResourcePagination from "../../js/core/resource/model/ResourcePagination";
import AxiosServiceInterface from "../../js/core/service/communication/AxiosServiceInterface";
import AxiosService from "../../js/core/service/communication/AxiosService";
import {NonTypedObject} from "../../js/core/type/object/NonTypedObject";

@Component({})
export default class Users extends Vue {

  public model!: User;

  public models: User[];

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
    this.model = new User();

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

  public onClickEditButton(user: User): void {
    this.hideForms();
    this.isEditFormShowing = true;
    this.model = user;
  }

  public onClickDeleteButton(user: User): void {
    this.hideForms();
    this.isDeleteConfirmShowing = true;
    this.model = user;
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

    this.models = _.remove(this.models, (user: User) => {
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
    this.models = ResourceCollection.fromResponse<User>(
      responseData,
      User
    );

    this.paginationData = responseData.pagination;
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
