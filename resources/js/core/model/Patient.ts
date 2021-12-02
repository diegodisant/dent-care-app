import ViewModelAbstract from "./view/ViewModelAbstract";
import {NonTypedObject} from "../type/object/NonTypedObject";
import ViewModelInterface from "./view/ViewModelInterface";

export default class Patient extends ViewModelAbstract {
  public id: number;

  public userId: number;

  public name: string;

  public phoneNumber: string;

  public birthDate: string;

  public address: string;

  constructor() {
    super('patients');
    this.id = 0;
    this.userId = 3;
    this.name = '';
    this.phoneNumber = '';
    this.birthDate = '';
    this.address = '';
  }

  clear(): void {
    this.id = 0;
    this.userId = 3;
    this.name = '';
    this.phoneNumber = '';
    this.birthDate = '';
    this.address = '';
  }

  clone(): ViewModelInterface {
    const patient = new Patient();

    patient.id = this.id;
    patient.userId = this.userId;
    patient.name = this.name;
    patient.phoneNumber = this.phoneNumber;
    patient.birthDate = this.birthDate;
    patient.address = this.address;

    return patient;
  }


  getTableHeaders(): string[] {
    return [
      '#',
      'Nombre',
      'Teléfono',
      'Fecha de nacimiento',
      'Dirección',
      'Opciones'
    ];
  }

  toObject(): object {
    return {
      fk_user: this.userId,
      name: this.name,
      phone_number: this.phoneNumber,
      birth_date: this.birthDate,
      address: this.address,
    };
  }

  fromApiResource(resource: NonTypedObject): void {
    this.id = resource.id;
    this.userId = resource.fk_user;
    this.name = resource.name;
    this.phoneNumber = resource.phone_number;
    this.birthDate = resource.birth_date;
    this.address = resource.address;
  }
}
