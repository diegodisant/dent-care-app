import AxiosInterceptorAbstract from "./AxiosInterceptorAbstract";
import AxiosInterceptorConfig from "../config/axios/AxiosInterceptorConfig";
import {AxiosRequestConfig} from "axios";

export default class ConfigBearerAuthTokenInterceptor extends AxiosInterceptorAbstract {
    onIntercept(config: AxiosInterceptorConfig, token?: string): void {
        if (!token) {
            return;
        }

        config.getClient()
            .interceptors
            .request
            .use((config: AxiosRequestConfig): AxiosRequestConfig | Promise<AxiosRequestConfig> => {
                config.headers.Authorization = `Bearer ${token}`;

                if (!config.headers['Content-Type']) {
                    config.headers['Content-Type'] = 'application/json; charset=utf-8';
                }

                return config;
            });
    }
}
