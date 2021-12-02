import ApiModelInterface from "./ApiModelInterface";
import {NonTypedObject} from "../../type/object/NonTypedObject";

export default abstract class ApiModelAbstract implements ApiModelInterface {
  public abstract id: number;

  public page: number;

  private url: string;

  private endpointName: string;

  private endpointUrl: string;

  public abstract fromApiResource(resource: NonTypedObject): void;

  constructor(endpointName: string) {
    this.page = 1;
    this.url = 'http://api.dent-care.localhost/api/v1';
    this.endpointName = endpointName;
    this.endpointUrl = `${this.url}/${this.endpointName}`;
  }

  getApiResourceUrl(): string {
    return this.endpointUrl;
  }

  getApiResourcePaginatedUrl(): string {
    return `${this.endpointUrl}?page=${this.page}`;
  }

  getApiResourceUrlById(): string {
    return `${this.endpointUrl}/${this.id}`;
  }

  setPage(page: number): void {
    this.page = page;
  }

  nextPage(): void {
    this.page++;
  }

  prevPage(): void {
    this.page--;
  }
}
