import { AsyncStorage } from 'react-native';
import { STORE_DONATION } from './actionTypes';
import startMainTabs from '../../screens/MainTabs/startMainTabs';
import App from '../../../App';

export const storeDonation = (donation) => {
	return {
		type: STORE_DONATION,
		token: donation.token,
		data: donation.data
	};
};
