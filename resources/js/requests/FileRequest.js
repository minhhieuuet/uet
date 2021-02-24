import BaseModelRequest from './BaseModelRequest';

export default class FileRequest extends BaseModelRequest {
    getFiles(params) {
        const url = '/files';
        return this.get(url, params);
    }

    storeFile(params) {
        const url = '/files';
        return this.post(url, params);
    }

    getHistories(fileId) {
        const url = `/files/histories/${fileId}`;
        return this.get(url);
    }
}