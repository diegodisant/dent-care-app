<template>
  <div>
    <div class="table-section grid grid-cols-1 gap-10 justify-items-center">
      <loading-screen
        :loading="isWindowLoading"
      ></loading-screen>
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
                <span class="item-option material-icons edit">mode_edit</span>
                <span class="item-option material-icons delete">delete</span>
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
    <div>
      <button class="add-button"><span class="material-icons">add</span></button>
    </div>
  </div>
</template>

<script lang="ts">
import Component from "vue-class-component";
import BaseComponent from "../../js/core/component/BaseComponent";

import User from "../../js/core/model/User";
import ResourceCollectionResponse from "../../js/core/resource/response/ResourceCollectionResponse";
import ResourceCollection from "../../js/core/resource/ResourceCollection";

@Component({})
export default class Users extends BaseComponent {
  public created(): void {
    this.model = new User();

    this.all();
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
