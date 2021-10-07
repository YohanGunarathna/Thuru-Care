#create np array
import numpy as np
#create a file-- *
import pickle
#preprocess
import cv2
#get directory path
from os import listdir
import os
from keras.preprocessing.image import img_to_array
from sklearn.model_selection import train_test_split
from keras.models import model_from_json
from tensorflow import keras
from sklearn.preprocessing import LabelBinarizer
from keras.models import Sequential
from keras import backend as K
from keras.preprocessing.image import ImageDataGenerator
from keras.optimizers import Adam
from keras.preprocessing import image
from sklearn.preprocessing import MultiLabelBinarizer
from sklearn.model_selection import train_test_split
import matplotlib.pyplot as pltfrom_json
import json

testimagpath=None
INIT_LR = 1e-3
BS = 32
default_image_size = tuple((256, 256))
image_size = 0
directory_root =('trunk_data')
width=256
height=256
depth=3
data = {}


# try :
#     with open('trunk_data.json') as json_file:
#         data = json.load(json_file)
#         for p in data['Img_path']:
#             os.remove(p['path'])
# except Exception as e :
#     print("")


def convert_image_to_array(image_dir):
    try:
        image = cv2.imread(image_dir)
        if image is not None :
            image = cv2.resize(image, default_image_size)   
            return img_to_array(image)
        else :
            return np.array([])
    except Exception as e:
        print(f"Error : {e}")
        return None

image_list, label_list = [], []
try:
    
    root_dir = listdir(directory_root)
   
    for directory in root_dir :
        # remove .DS_Store from list
        if directory == ".DS_Store" :
            root_dir.remove(directory)

        for plant_folder in root_dir:
           
            plant_disease_image_list = listdir(f"{directory_root}/{plant_folder}")
            #plant_disease_image_list = listdir(f"../Image_processing")
            for single_plant_disease_image in plant_disease_image_list :
                if single_plant_disease_image == ".DS_Store" :
                    plant_disease_image_list.remove(single_plant_disease_image)

            for image in plant_disease_image_list[:200]:
                image_directory = f"{directory_root}/{plant_folder}/{image}"
                if image_directory.endswith(".jpg") == True or image_directory.endswith(".JPG") == True:
                    #image_list.append(convert_image_to_array(image_directory))
                    label_list.append(plant_folder)
    
except Exception as e:
    print("")


label_binarizer = LabelBinarizer()
image_labels = label_binarizer.fit_transform(label_list)
pickle.dump(label_binarizer,open('trunk_label_transform.pkl', 'wb'))
n_classes = len(label_binarizer.classes_)
#print(label_binarizer.classes_)

reconstructed_model = keras.models.load_model('trunk_model_save.json')

directory_rootimg =('uploadsTrunk')

try:
    root_dirimg = listdir(directory_rootimg)
    for image in root_dirimg:
      image_directorytest = f"{directory_rootimg}/{image}"
      if image_directorytest.endswith(".jpg") == True or image_directorytest.endswith(".JPG") == True:
        testimagpath=image_directorytest
except Exception as e:
    print(f"Error : {e}")

data = {}
data['Img_path'] = []
data['Img_path'].append({
    'path': testimagpath
})
with open('trunk_data.json', 'w') as outfile:
    json.dump(data, outfile)

outfile.close()
data=None

imar = convert_image_to_array(testimagpath)
npimagelist = np.array([imar], dtype=np.float16) / 225.0
predictclass = reconstructed_model.predict_classes(npimagelist)
output=label_binarizer.classes_[predictclass]
print (label_binarizer.classes_[predictclass])
os.remove(testimagpath)
