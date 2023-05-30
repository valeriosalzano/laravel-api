import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
import { addSweetDelete } from './sweet_delete';
import { addFormElementDelete } from './sweet_delete';

// *** PROJECT DELETE ***
addSweetDelete('.sweet-delete.btn','.project-container','.project-title');
// *** TYPE DELETE ***
addSweetDelete('.sweet-delete.btn','.type-container','.type-name');
// *** TECHNOLOGY DELETE ***
addSweetDelete('.sweet-delete.btn','.technology-container','.technology-name');
// *** EDIT COVER_IMAGE DELETE ***
addFormElementDelete('cover_image');