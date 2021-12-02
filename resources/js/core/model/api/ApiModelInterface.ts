import {NonTypedObject} from "../../type/object/NonTypedObject";

export default interface ApiModelInterface {
  id: number;

  page: number;

  fromApiResource(resource: NonTypedObject): void;

  getApiResourceUrl(): string;

  getApiResourcePaginatedUrl(): string;

  getApiResourceUrlById(): string;

  setPage(page: number): void;

  nextPage(): void;

  prevPage(): void;
}
