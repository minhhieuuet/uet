import BaseModelRequest from './BaseModelRequest';

export default class FileRequest extends BaseModelRequest {
    getFiles(params) {
        const url = '/files';
        return this.get(url, params);
    }
}