import {NonTypedObject} from "../../type/object/NonTypedObject";

export default interface ApiModelInterface {
  id: number;

  fromApiResource(resource: NonTypedObject): void;

  getApiResourceUrl(): string;

  getApiResourceUrlById(): string;
}
