import ApiModelInterface from "../api/ApiModelInterface";

export default interface ViewModelInterface extends ApiModelInterface {
  clear(): void;

  clone(): ViewModelInterface;

  getTableHeaders(): string[];

  toObject(): object;
}
