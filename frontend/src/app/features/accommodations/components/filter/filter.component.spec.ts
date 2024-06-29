import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccomodationsFilterComponent } from './filter.component';

describe('FilterComponent', () => {
  let component: AccomodationsFilterComponent;
  let fixture: ComponentFixture<AccomodationsFilterComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AccomodationsFilterComponent]
    })
      .compileComponents();

    fixture = TestBed.createComponent(AccomodationsFilterComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
