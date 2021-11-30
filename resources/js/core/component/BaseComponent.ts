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

  public paginationData!: ResourcePagination;

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
  }

  public all(): void {
    this.axiosService.all(
      this.model,
      (responseData: ResourceCollectionResponse) => {
        this.buildCollection(responseData);
        this.isWindowLoading = false;
      },
      (responseError: NonTypedObject) => {
        console.log(responseError);
        this.isWindowLoading = false;
      }
    );
  }

  public create(): void {

  }

  public edit(): void {

  }
}
