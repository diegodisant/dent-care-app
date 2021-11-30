import axios, {AxiosError, AxiosInstance, AxiosResponse} from "axios";
import ViewModelInterface from "../../model/view/ViewModelInterface";
import ResourceCollectionResponse from "../../resource/response/ResourceCollectionResponse";
import {NonTypedObject} from "../../type/object/NonTypedObject";
import AxiosServiceInterface from "./AxiosServiceInterface";

export default class AxiosService implements AxiosServiceInterface{
  private readonly client: AxiosInstance;

  constructor() {
    this.client = axios.create();
  }

  public getClient(): AxiosInstance {
    return this.client;
  }

  all(
    model: ViewModelInterface,
    onSuccess: (responseData: ResourceCollectionResponse) => void,
    onFail: (responseError: NonTypedObject) => void
  ): void {
    this.client
      .get(model.getApiResourceUrl())
      .then((response: AxiosResponse) => {
        onSuccess(response.data);
      })
      .catch((error: AxiosError) => {
        onFail(error);
      });
  }

  create(
    model: ViewModelInterface,
    onSuccess: (responseData: ResourceCollectionResponse) => void,
    onFail: (responseError: NonTypedObject) => void
  ): void {
    return;
  }

  update(
    model: ViewModelInterface,
    onSuccess: (responseData: NonTypedObject) => void,
    onFail: (responseError: NonTypedObject) => void
  ): void {
    return;
  }

  delete(
    model: ViewModelInterface,
    onSuccess: (responseData: NonTypedObject) => void,
    onFail: (responseError: NonTypedObject) => void
  ): void {
    return;
  }
}
