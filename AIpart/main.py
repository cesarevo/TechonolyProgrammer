import speech_recognition as sr
from googletrans import Translator

def speech_recognition(filename):
    text = ''
    r = sr.Recognizer(filename)
    with sr.AudioFile(filename) as source:
        audio_data = r.record(source)
        text = r.recognize_google(audio_data)
    return text

def translate_recognitioned(text):
    translator = Translator()
    translated_text = translator.translate(text, dest='ru')
    return translated_text.text

def test_recognition(filename):
    assert speech_recognition(filename) == "i'm eating"


if __name__ == '__main__':

    text_original = speech_recognition('filename')
    translated_text = translate_recognitioned(text_original)




