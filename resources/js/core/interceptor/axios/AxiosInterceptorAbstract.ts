import InterceptorInterface from "../InterceptorInterface";
import AxiosInterceptorConfig from "../config/axios/AxiosInterceptorConfig";
import InterceptorConfigInterface from "../config/InterceptorConfigInterface";

export default abstract class AxiosInterceptorAbstract implements InterceptorInterface{
    abstract onIntercept(config: AxiosInterceptorConfig): void;
}
