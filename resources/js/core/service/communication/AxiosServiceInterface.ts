import {AxiosInstance} from "axios";
import ViewModelInterface from "../../model/view/ViewModelInterface";
import ResourceCollectionResponse from "../../resource/response/ResourceCollectionResponse";
import {NonTypedObject} from "../../type/object/NonTypedObject";

export default interface AxiosServiceInterface {
  getClient(): AxiosInstance;

  all(
    model: ViewModelInterface,
    onSuccess: (responseData: ResourceCollectionResponse) => void,
    onFail: (responseError: NonTypedObject) => void,
  ): void;

  create(
    model: ViewModelInterface,
    onSuccess: (responseData: NonTypedObject) => void,
    onFail: (responseError: NonTypedObject) => void,
  ): void;

  update(
    model: ViewModelInterface,
    onSuccess: (responseData: NonTypedObject) => void,
    onFail: (responseError: NonTypedObject) => void,
  ): void;

  delete(
    model: ViewModelInterface,
    onSuccess: (responseData: NonTypedObject) => void,
    onFail: (responseError: NonTypedObject) => void,
  ): void;
}
