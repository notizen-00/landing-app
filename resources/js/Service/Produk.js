import  axios  from "axios"

const url = window.location.origin;

export const OnDataUpdate = async() =>{

    try{
        const result = await axios.get(url+'/api/mitra');
        return result.data;
    
    }catch(error){

        
    }

}

export const verifikasi = async(id) => {
    try{

      const result = await axios.get(url+'/api/mitra/'+id+'/verifikasi');

      return result.data;

    }catch(e){


    }

  };