import {NonTypedObject} from "../../type/object/NonTypedObject";
import ResourcePagination from "../model/ResourcePagination";

export default interface ResourceCollectionResponse {
    items: NonTypedObject[],
    pagination: ResourcePagination,
}
