import { AbstractControl, ValidationErrors, ValidatorFn } from '@angular/forms';

export function dependeRequiredValidator(formControlName: string, expectedValue: any): ValidatorFn {
    return (control: AbstractControl): ValidationErrors | null => {
        const parentGroup = control.root.get(formControlName) as AbstractControl;
        if (parentGroup) {
            const value = parentGroup?.value;
            if (value === expectedValue && !control.value) {
                return { dependeRequired: true };
            }
        }
        return null;
    };
}
