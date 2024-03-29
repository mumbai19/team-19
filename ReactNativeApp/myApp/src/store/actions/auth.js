import { AsyncStorage } from 'react-native';
import { TRY_AUTH, AUTH_SET_TOKEN, AUTH_REMOVE_TOKEN } from './actionTypes';
import startMainTabs from '../../screens/MainTabs/startMainTabs';
import App from '../../../App';
import { uiStartLoading, uiStopLoading } from './index';

export const tryAuth = (authData, authMode) => {
	return (dispatch) => {
		dispatch(uiStartLoading());
		const loginurl = 'http://10.49.154.195:8000/api/auth/login/';
		const signupurl = 'http://10.49.154.195:8000/api/auth/register/';
		startMainTabs();
		// let body = {
		// 	email: authData.email,
		// 	password: authData.password
		// };
		// let url = '';
		// if (authMode == 'login') {
		// 	url = loginurl;
		// } else {
		// 	url = signupurl;
		// 	body['password2'] = authData.password;
		// }
		// fetch(url, {
		// 	method: 'POST',
		// 	body: JSON.stringify(body),
		// 	headers: {
		// 		'Content-Type': 'application/json'
		// 	}
		// })
		// 	.then((res) => res.json())
		// 	.then((parsedRes) => {
		// 		if (!parsedRes.token) {
		// 			dispatch(uiStopLoading());
		// 			// alert('Authentication failed due to 400 error');
		// 			console.log(parsedRes);
		// 			startMainTabs();
		// 		} else {
		// 			dispatch(authStoreToken(parsedRes.token, parsedRes.expires));
		// 			dispatch(uiStopLoading());
		// 			startMainTabs();
		// 		}
		// 	})
		// 	.catch((err) => {
		// 		console.log(err);
		// 		dispatch(uiStopLoading());
		// 		// alert('Authentication failed');
		// 		startMainTabs();
		// 	});
		// fetch('http://192.168.0.107:3000/users')
		// 	.then((response) => response.json())
		// 	.then((users) => alert(users))
		// 	.catch((err) => {
		// 		alert(err);
		// 	});
	};
};

export const authSetToken = (token) => {
	return {
		type: AUTH_SET_TOKEN,
		token: token
	};
};

export const authGetToken = () => {
	return (dispatch, getState) => {
		const promise = new Promise((resolve, reject) => {
			const token = getState().auth.token;
			if (!token) {
				let fetchedToken;
				AsyncStorage.getItem('myApp:auth:token')
					.catch((err) => reject())
					.then((tokenFromStorage) => {
						fetchedToken = tokenFromStorage;
						if (!tokenFromStorage) {
							reject();
						}
						return AsyncStorage.getItem('myApp.auth.expiryDate');
					})
					.then((expiryDate) => {
						const parsedExpiryDate = new Date(parseInt(expiryDate));
						const now = new Date();
						if (parsedExpiryDate > now) {
							dispatch(authSetToken(fetchedToken));
							resolve(fetchedToken);
						} else {
							reject();
						}
					});
			} else {
				resolve(token);
			}
		});
		promise.catch((err) => {
			dispatch(authClearStorage());
		});
		return promise;
	};
};

export const authStoreToken = (token, expires) => {
	return (dispatch) => {
		dispatch(authSetToken(token));
		const now = new Date();
		const expiryDate = now.getTime() + expires * 1000;
		AsyncStorage.setItem('myApp:auth:token', token);
		AsyncStorage.setItem('myApp:auth:expiryDate', expiryDate.toString());
	};
};

export const authAutoSignIn = () => {
	return (dispatch) => {
		dispatch(authGetToken())
			.then((token) => {
				startMainTabs();
			})
			.catch((err) => console.log(err));
	};
};

export const authClearStorage = () => {
	return (dispatch) => {
		AsyncStorage.removeItem('myApp:auth:token');
		return AsyncStorage.removeItem('myApp:auth:expiryDate');
	};
};

export const authLogout = () => {
	return (dispatch) => {
		dispatch(authClearStorage()).then(() => {
			App();
		});
		dispatch(authRemoveToken());
	};
};

export const authRemoveToken = () => {
	return {
		type: AUTH_REMOVE_TOKEN
	};
};
