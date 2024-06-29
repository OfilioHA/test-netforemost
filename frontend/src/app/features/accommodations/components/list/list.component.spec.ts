import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccomodationsListComponent } from './list.component';

describe('ListComponent', () => {
  let component: AccomodationsListComponent;
  let fixture: ComponentFixture<AccomodationsListComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AccomodationsListComponent]
    })
      .compileComponents();

    fixture = TestBed.createComponent(AccomodationsListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
