import { Component, EventEmitter, Output } from '@angular/core';
import { FormControl, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { dependeRequiredValidator } from '../../../../core/validators/depende.validator';

@Component({
  selector: 'accommodations-filter',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './filter.component.html',
})
export class AccomodationsFilterComponent {

  @Output() filterUpdated = new EventEmitter();

  public filterForm = new FormGroup({
    minimum: new FormControl(''),
    maximun: new FormControl(''),
    bedrooms: new FormControl(''),
    use_coordinates: new FormControl(false),
    latitude: new FormControl('', [
      Validators.min(-90),
      Validators.max(90),
      dependeRequiredValidator('use_coordinates', true)
    ]),
    longitude: new FormControl('', [
      Validators.min(-90),
      Validators.max(90),
      dependeRequiredValidator('use_coordinates', true)
    ]),
    distance: new FormControl('', [
      dependeRequiredValidator('use_coordinates', true)
    ]),
  })

  public handleSubmit() {
    const isValid = this.filterForm.valid;
    if (!isValid) return;
    const values = this.filterForm.value;
    this.filterUpdated.emit(values);
  }

  public handleCoordinatesCheck() {
    this.filterForm.patchValue({
      latitude: '',
      longitude: '',
      distance: ''
    });
  }

}
