import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccomodationsItemComponent } from './item.component';

describe('ItemComponent', () => {
  let component: AccomodationsItemComponent;
  let fixture: ComponentFixture<AccomodationsItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AccomodationsItemComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AccomodationsItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
