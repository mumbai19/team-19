import { UI_START_LOADING, UI_STOP_LOADING } from './actionTypes';

export const uiStartLoading = (key) => {
	return {
		type: UI_START_LOADING
	};
};

export const uiStopLoading = (key) => {
	return {
		type: UI_STOP_LOADING
	};
};
