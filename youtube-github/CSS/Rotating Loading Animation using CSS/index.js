const Validator = require('Validator');
console.log('5');


const data = {
    name: 'John Doe',
    company: 'Example Co.',
    birthday: '1985-04-16'
};

const rules = {
    name: 'required',
    // for multiple rules
    birthday: 'required|date', // can be a piped string
    company: ['required', 'string'] // can be an array of strings
};

const v = Validator.make(data, rules);

if (v.fails()) {
    const errors = v.getErrors();
    console.log(errors);
}