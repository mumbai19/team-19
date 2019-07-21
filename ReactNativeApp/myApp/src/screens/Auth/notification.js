import firebase from 'react-native-firebase';

const checkPermission = () => {
	firebase.messaging().hasPermission().then((enabled) => {
		if (enabled) {
			this.getToken();
		} else {
			firebase
				.messaging()
				.requestPermission()
				.then(() => {
					this.getToken();
				})
				.catch((error) => {
					alert('User rejected');
				});
		}
	});
};

const getToken = () => {
	firebase.messaging().getToken().then((fcmToken) => {
		if (fcmToken) {
			console.log(fcmToken);
			this.setState({
				token: fcmToken
			});
		} else {
			alert('User device does not have a token');
		}
	});
};
