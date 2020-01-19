import axios from "axios";
// import * as types from '../mutation-types'

export const actions = {
  async uploadImage(context, set) {
    console.log("uploadimage start");
    if (set.image) {
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      let formData = new FormData();
      formData.append("image", set.image);
      formData.append("path", set.path);
      const { data } = await axios.post("/api/uploadImage", formData, config);
      // console.log('uploadimage end', data)
      return data;
    } else {
      return null;
    }
  }
};