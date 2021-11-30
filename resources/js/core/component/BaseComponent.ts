import Vue from "vue";
import ViewModelInterface from "../model/view/ViewModelInterface";
import AxiosServiceInterface from "../service/communication/AxiosServiceInterface";
import AxiosService from "../service/communication/AxiosService";
import ResourceCollectionResponse from "../resource/response/ResourceCollectionResponse";
import {NonTypedObject} from "../type/object/NonTypedObject";

export default abstract class BaseComponent extends Vue {
  public model!: ViewModelInterface;

  public models: ViewModelInterface[];

  public isFormShowing: boolean;

  public axiosService: AxiosServiceInterface;

  public abstract buildCollection(responseData: ResourceCollectionResponse): void;

  constructor() {
    super();

    this.models = [];
    this.isFormShowing = false;
    this.axiosService = new AxiosService();
  }

  public all(): void {
    this.axiosService.all(
      this.model,
      (responseData: ResourceCollectionResponse) => {

      },
      (responseError: NonTypedObject) => {

      }
    );
  }
}
