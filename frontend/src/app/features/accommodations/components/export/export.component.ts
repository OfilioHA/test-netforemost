import { Component, EventEmitter, Output, inject } from '@angular/core';
import { FormControl, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { dependeRequiredValidator } from '../../../../core/validators/depende.validator';
import { AccommodationsService } from '../../accommodations.service';

@Component({
  selector: 'accommodations-export',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './export.component.html',
})
export class AccomodationsExportComponent {

  @Output() filterUpdated = new EventEmitter();
  protected service = inject(AccommodationsService);
  public path: string = ''
  public loading:boolean = false;

  public exportForm = new FormGroup({
    minimum: new FormControl(''),
    maximun: new FormControl(''),
    bedrooms: new FormControl(''),
    report: new FormControl('', [Validators.required]),
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
    const isValid = this.exportForm.valid;
    if (!isValid) return;
    const values = this.exportForm.value;
    this.loading = true;
    const request = this.service.generateReport(values);
    request.subscribe((response) => {
      this.path = response.path;
      this.loading = false;
    })
  }

  public handleCoordinatesCheck() {
    this.exportForm.patchValue({
      latitude: '',
      longitude: '',
      distance: ''
    });
  }

}
