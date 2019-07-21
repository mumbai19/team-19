import { STORE_DONATION } from '../actions/actionTypes';

const initialState = {
	donation: {}
};

const reducer = (state = initialState, action) => {
	switch (action.type) {
		case STORE_DONATION:
			return {
				...state,
				donation: {
					...state.donation,
					[action.token]: {
						...action.data
					}
				}
			};
			break;
		default:
			return state;
	}
};

export default reducer;
