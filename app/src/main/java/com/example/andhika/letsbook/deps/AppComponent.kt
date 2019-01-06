package com.example.andhika.letsbook.deps

import android.app.Application
import com.example.andhika.letsbook.LetsbookApplication
import dagger.BindsInstance
import dagger.Component
import dagger.android.AndroidInjector
import dagger.android.DaggerApplication
import dagger.android.support.AndroidSupportInjectionModule
import javax.inject.Singleton


@Singleton
@Component(
    modules = arrayOf(
        AndroidSupportInjectionModule::class,
        NetworkModule::class,
        ActivityBuilder::class,
        FragmentBuilder::class,
        SharedPreferenceModule::class
    )
)
interface AppComponent : AndroidInjector<DaggerApplication> {
    fun inject(letsbookApplication: LetsbookApplication)

    @Component.Builder
    interface Builder {
        @BindsInstance
        fun application(application: Application): Builder

        fun sharedPreferences(sharedPreferenceModule: SharedPreferenceModule): Builder
        fun networkModule(networkModule: NetworkModule): Builder
        fun build(): AppComponent
    }
}
