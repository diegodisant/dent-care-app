import ApiModelInterface from "./ApiModelInterface";
import {NonTypedObject} from "../../type/object/NonTypedObject";

export default abstract class ApiModelAbstract implements ApiModelInterface {
    public abstract id: number;

    private url: string;

    private endpointName: string;

    private endpointUrl: string;

    public abstract fromApiResource(resource: NonTypedObject): void;

    constructor(endpointName: string) {
        this.url = 'http://api.dent-care.localhost/api/v1';
        this.endpointName = endpointName;
        this.endpointUrl = `${this.url}/${this.endpointName}`;
    }

    getApiResourceUrl(): string {
        return this.endpointUrl;
    }

    getApiResourceUrlById(): string {
        return `${this.endpointUrl}/${this.id}`;
    }
}
