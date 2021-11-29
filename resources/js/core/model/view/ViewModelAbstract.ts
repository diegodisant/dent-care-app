import ApiModelAbstract from "../api/ApiModelAbstract";
import ViewModelInterface from "./ViewModelInterface";

export default abstract class ViewModelAbstract extends ApiModelAbstract implements ViewModelInterface {
    public abstract clear(): void;

    public abstract clone(): ViewModelInterface;

    public abstract getTableHeaders(): string[];

    public abstract toObject(): object;
}
