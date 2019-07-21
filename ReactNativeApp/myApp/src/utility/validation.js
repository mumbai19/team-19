const validate = (val, rules, connectedValue) => {
	let isValid = {
		status: true,
		message: ''
	};
	for (let rule in rules) {
		switch (rule) {
			case 'isEmail':
				isValid.status = isValid && emailValidator(val);
				if (!isValid.status) {
					isValid['message'] = 'Email is not valid';
				}
				break;
			case 'minLength':
				isValid.status = isValid && minLengthValidator(val, rules[rule]);
				if (!isValid.status) {
					isValid['message'] = 'Minimum length is ' + rules[rule];
				}
				break;
			case 'equalTo':
				isValid.status = isValid && equalToValidator(val, connectedValue[rule]);
				if (!isValid.status) {
					isValid['message'] = 'Passwords dont match';
				}
				break;
			case 'notEmpty':
				isValid.status = isValid && notEmptyValidator(val);
				if (isValid.status) {
					isValid['message'] = 'Required';
				}
				break;
			default:
				isValid = true;
		}
	}

	return isValid;
};

const emailValidator = (val) => {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
		val
	);
};

const minLengthValidator = (val, minLength) => {
	return val.length >= minLength;
};

const equalToValidator = (val, checkValue) => {
	return val === checkValue;
};

const notEmptyValidator = (val) => {
	return val.trim() !== '';
};

export default validate;
