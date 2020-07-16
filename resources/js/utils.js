
import { lang } from './translations'

export const fullPath = 'http://127.0.0.1:8000'

export const language = lang.es


export const validateEmail = (email) =>{
	var pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	if (pattern.test(email)) {
		return true;
	}
	return false;
}

export const validatePassword = (password) =>{
	if (password.length < 4) {
		return false;
	}
	return true;
}


