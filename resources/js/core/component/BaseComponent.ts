import Vue from "vue";
import ViewModelInterface from "../model/view/ViewModelInterface";
import AxiosServiceInterface from "../service/communication/AxiosServiceInterface";
import AxiosService from "../service/communication/AxiosService";
import ResourceCollectionResponse from "../resource/response/ResourceCollectionResponse";
import {NonTypedObject} from "../type/object/NonTypedObject";
import ResourcePagination from "../resource/model/ResourcePagination";

export default abstract class BaseComponent extends Vue {
  public model!: ViewModelInterface;

  public models: ViewModelInterface[];

  public paginationData: ResourcePagination;

  public isFormShowing: boolean;

  public isWindowLoading: boolean;

  public axiosService: AxiosServiceInterface;

  public abstract buildCollection(responseData: ResourceCollectionResponse): void;

  constructor() {
    super();

    this.models = [];
    this.isFormShowing = false;
    this.isWindowLoading = true;
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

  public create(): void {

  }

  public edit(): void {

  }
}
