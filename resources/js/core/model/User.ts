import ViewModelAbstract from "./view/ViewModelAbstract";
import {NonTypedObject} from "../type/object/NonTypedObject";
import {UserTypesEnum} from "../type/enum/UserTypesEnum";

export default class User extends ViewModelAbstract {
  public id: number;

  public name: string;

  public email: string;

  public password: string;

  public userType: UserTypesEnum;

  private tableHeaders: string[] = [
    '#',
    'Nombre',
    'Email',
    'Tipo de usuario',
    'Opciones',
  ];

  constructor() {
    super('users');

    this.id = 0;
    this.name = '';
    this.email = '';
    this.password = '';
    this.userType = UserTypesEnum.Patient;
  }

  clear(): void {
    this.id = 0;
    this.name = '';
    this.email = '';
    this.password = '';
    this.userType = UserTypesEnum.Patient;
  }

  clone(): User {
    const user = new User();

    user.id = this.id;
    user.name = this.name;
    user.email = this.email;
    user.password = this.password;
    user.userType = this.userType;

    return user;
  }

  getTableHeaders(): string[] {
    return this.tableHeaders;
  }

  toObject(): object {
    return {
      name: this.name,
      email: this.email,
      password: this.password,
      user_type: this.userType,
    };
  }

  fromApiResource(resource: NonTypedObject): void {
    this.id = resource.id;
    this.name = resource.name;
    this.email = resource.email;
    this.userType = resource.user_type;
  }
}
