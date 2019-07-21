import { AsyncStorage } from 'react-native';
import { FCM_SET_TOKEN, FCM_REMOVE_TOKEN } from './actionTypes';
import firebase from 'react-native-firebase';

export const getToken = () => {
	return (dispatch, getState) => {
		const fcmToken = getState().fcm.fcmToken;
		if (!fcmToken) {
			firebase.messaging().getToken().then((fcmToken) => {
				if (fcmToken) {
					console.log(fcmToken);
					dispatch(fcmSetToken(fcmToken));
				} else {
					alert('User device does not have a token');
				}
			});
		} else {
			dispatch(fcmSetToken(fcmToken));
		}
	};
};

export const fcmCheckPermissions = () => {
	return (dispatch) => {
		firebase.messaging().hasPermission().then((enabled) => {
			if (enabled) {
				dispatch(getToken());
			} else {
				firebase
					.messaging()
					.requestPermission()
					.then(() => {
						dispatch(getToken());
					})
					.catch((error) => {
						alert('User rejected');
					});
			}
		});
	};
};

export const fcmSetToken = (token) => {
	return {
		type: FCM_SET_TOKEN,
		fcmtoken: token
	};
};

export const fcmRemoveToken = () => {
	return {
		type: FCM_REMOVE_TOKEN
	};
};
