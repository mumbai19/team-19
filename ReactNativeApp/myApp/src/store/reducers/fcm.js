import { FCM_SET_TOKEN, FCM_REMOVE_TOKEN } from '../actions/actionTypes';

const initialState = {
	fcmtoken: null
};

const reducer = (state = initialState, action) => {
	switch (action.type) {
		case FCM_SET_TOKEN:
			return {
				...state,
				fcmtoken: action.token
			};
			break;
		case FCM_REMOVE_TOKEN:
			return {
				...state,
				fcmtoken: null
			};
		default:
			return state;
	}
};

export default reducer;
