import { ComponentFixture, TestBed } from '@angular/core/testing';
import { AccommodationsIndexPage } from './index.component';

describe('IndexComponent', () => {
  let component: AccommodationsIndexPage;
  let fixture: ComponentFixture<AccommodationsIndexPage>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AccommodationsIndexPage]
    })
      .compileComponents();

    fixture = TestBed.createComponent(AccommodationsIndexPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
