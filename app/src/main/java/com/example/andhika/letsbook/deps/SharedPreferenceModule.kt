package com.example.andhika.letsbook.deps

import android.content.Context
import android.content.SharedPreferences
import dagger.Module
import dagger.Provides
import javax.inject.Singleton

@Module
class SharedPreferenceModule(private val sharedPreferenceName: String, private val context: Context) {

    @Provides
    @Singleton
    fun providesSharedPreference() = context.getSharedPreferences(sharedPreferenceName, Context.MODE_PRIVATE)

    @Provides
    @Singleton
    fun providesSharedPreferenceHelper(sharedPreference: SharedPreferences) = SharedPreferenceHelper(sharedPreference)
}