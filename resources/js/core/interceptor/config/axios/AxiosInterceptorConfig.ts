import InterceptorConfigInterface from "../InterceptorConfigInterface";
import {AxiosInstance} from "axios";

export default class AxiosInterceptorConfig implements InterceptorConfigInterface {
  private client!: AxiosInstance;

  public setClient(axiosClient: AxiosInstance): void {
    this.client = axiosClient;
  }

  public getClient(): AxiosInstance {
    return this.client;
  }
}
