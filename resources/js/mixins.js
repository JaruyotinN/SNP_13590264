import { mapActions } from "vuex";
import axios from "axios";
export default {
    methods: {
        ...mapActions({
          upImg: "upload/uploadImage"
        }),
        async uploadFile(set) {
          console.log("uploadfile start");
          console.log(set);
          if (set.file) {
            const config = {
              headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("file", set.file);
            formData.append("path", set.path);
            const { data } = await axios.post("/api/uploadFile", formData, config);
            return data;
          } else {
            return null;
          }
        },
        async uploadCv(set) {
          console.log("uploadCv start");
          console.log(set);
          if (set.file) {
            const config = {
              headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("file", set.file);
            formData.append("path", set.path);
            const { data } = await axios.post("/api/uploadCv", formData, config);
            return data;
          } else {
            return null;
          }
        },
        async uploadTranscript(set) {
          console.log("uploadTranscript start");
          console.log(set);
          if (set.file) {
            const config = {
              headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("file", set.file);
            formData.append("path", set.path);
            const { data } = await axios.post("/api/uploadTranscript", formData, config);
            return data;
          } else {
            return null;
          }
        }
},
}