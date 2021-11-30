import AxiosInterceptorAbstract from "./AxiosInterceptorAbstract";
import AxiosInterceptorConfig from "../config/axios/AxiosInterceptorConfig";
import {AxiosResponse} from "axios";

export default class OnUnauthorizedRequestInterceptor extends AxiosInterceptorAbstract {
  onIntercept(config: AxiosInterceptorConfig, onUnauthorized?: () => void): void {
    config
      .getClient()
      .interceptors
      .response
      .use(
        (response: AxiosResponse): AxiosResponse | Promise<AxiosResponse> => {
          return response;
        },
        (error: any) => {
          if (!(error instanceof Error) || !onUnauthorized) {
            return error;
          }

          const isFullyUnauthorized: boolean = (
            error.stack !== null
          );

          if (isFullyUnauthorized) {
            onUnauthorized();
          }
        }
      );
  }
}
