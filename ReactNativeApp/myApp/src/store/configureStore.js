import { createStore, combineReducers, applyMiddleware, compose } from 'redux';
import thunk from 'redux-thunk';

import placesReducer from './reducers/places';
import authReducer from './reducers/auth';
import fcmReducer from './reducers/fcm';
import uiReducer from './reducers/ui';
import donationReducer from './reducers/donation';

const rootReducer = combineReducers({
	places: placesReducer,
	auth: authReducer,
	fcm: fcmReducer,
	ui: uiReducer,
	don: donationReducer
});

let composeEnhancers = compose;

if (__DEV__) {
	composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
}

const configureStore = () => {
	return createStore(rootReducer, composeEnhancers(applyMiddleware(thunk)));
};

export default configureStore;
