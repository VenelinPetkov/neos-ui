import {takeLatest} from 'redux-saga';
import {put} from 'redux-saga/effects';

import {actions, actionTypes} from '@neos-project/neos-ui-redux-store';

import {dom, style} from './helpers';

export default function * showNode() {
    yield * takeLatest(actionTypes.CR.Nodes.SHOW, function * performPropertyChange(action) {
        const contextPath = action.payload;
        const domElement = dom.find(`[data-__neos-node-contextpath="${contextPath}"]`);

        if (domElement) {
            domElement.classList.remove(style.markHiddenNodeAsHidden);
        }

        yield put(actions.Changes.persistChange({
            type: 'Neos.Neos.Ui:Property',
            subject: contextPath,
            payload: {
                propertyName: '_hidden',
                value: false
            }
        }));
    });
}
