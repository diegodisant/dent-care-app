import InterceptorConfigInterface from "./config/InterceptorConfigInterface";

export default interface InterceptorInterface {
  onIntercept(config: InterceptorConfigInterface): void;
}
