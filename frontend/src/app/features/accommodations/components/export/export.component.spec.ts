import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccomodationsExportComponent } from './export.component';

describe('FilterComponent', () => {
  let component: AccomodationsExportComponent;
  let fixture: ComponentFixture<AccomodationsExportComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AccomodationsExportComponent]
    })
      .compileComponents();

    fixture = TestBed.createComponent(AccomodationsExportComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
