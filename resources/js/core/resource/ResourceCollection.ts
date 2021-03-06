import { NonTypedObject} from "../type/object/NonTypedObject";
import ResourceCollectionResponse from "./response/ResourceCollectionResponse";
import ResourcePagination from "./model/ResourcePagination";
import ViewModelAbstract from "../model/view/ViewModelAbstract";

class ResourceCollection {
    public fromResponse<ModelType>(
        responseData: ResourceCollectionResponse,
        InstanceType: (new () => ModelType),
    ): ModelType[] {
        const transformedModels: ModelType[] = [];

        responseData.items.forEach((item: NonTypedObject) => {
            const retrievedModel: ModelType = new InstanceType();

            if (!(retrievedModel instanceof ViewModelAbstract)) {
                return;
            }

            retrievedModel.fromApiResource(item);
            transformedModels.push(retrievedModel);
        });
        return transformedModels;
    }
}

export default new ResourceCollection();
