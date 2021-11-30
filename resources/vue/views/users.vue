<template>
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
            class="py-2 px-4"
          >
            {{ tableHeader }}
          </th>
        </tr>
        </thead>
        <tbody>
        <tr
          v-for="(user, userIndex) of models"
        >
          <th class="border py-2 px-3">{{ userIndex + 1 }}</th>
          <td class="border py-2 px-3">{{ user.name }}</td>
          <td class="border py-2 px-3">{{ user.email }}</td>
          <td class="border py-2 px-3">{{ user.userType }}</td>
          <td class="border py-2 px-3">edit, delete, view</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script lang="ts">
import Component from "vue-class-component";
import BaseComponent from "../../js/core/component/BaseComponent";

import {User} from "../../js/core/model/User";
import ResourceCollectionResponse from "../../js/core/resource/response/ResourceCollectionResponse";
import ResourceCollection from "../../js/core/resource/ResourceCollection";

@Component({})
export default class Users extends BaseComponent {
  public created(): void {
    this.model = new User();

    this.all();
  }

  buildCollection(responseData: ResourceCollectionResponse): void {
    this.models = ResourceCollection.fromResponse<User>(
      responseData,
      User
    );

    this.paginationData = responseData.pagination;
  }
};
</script>
